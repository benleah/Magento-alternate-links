<?php /*
* =============================================================================
*
* eStorePro - AlternateLinks
* Version 1.0.0
*
* =============================================================================
*
* The MIT License (MIT)
*
* Copyright (c) 2014 Ben Leah :: eStorePro
*
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
*
* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
*/
  
class Estorepro_AlternateLinks_Model_Observer
{

    public function alternateLinks()
    {
        $headBlock = Mage::app()->getLayout()->getBlock('head');
        $stores = Mage::app()->getWebsite()->getStores();
        $currentUrl = Mage::helper('core/url')->getCurrentUrl();
        
        if(Mage::getStoreConfig("web/alternatelinks/enable_module") != false)
        {
            if($headBlock)
            {
                foreach ($stores as $store) 
                {
                    $lang = $store->getConfig('general/locale/code');
                    $cleanUrl = preg_replace('/\?.*/', '', $store->getCurrentUrl());
                    
                    if(Mage::getStoreConfig("web/alternatelinks/hreflang_value") == 'language') {
                        $lang = substr($lang, 0, 2);
                    } elseif(Mage::getStoreConfig("web/alternatelinks/hreflang_value") == 'language-region') {
                        $lang = preg_replace("/[\s_]/", "-", $lang);
                    }
            
                    if($cleanUrl != $currentUrl) {
                        $headBlock->addLinkRel('alternate"' . ' hreflang="' . $lang, $cleanUrl);
                    }
                }
            }
            return $this;
        }
    }
}