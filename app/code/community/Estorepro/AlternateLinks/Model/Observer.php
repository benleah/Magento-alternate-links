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
        //Stores Magento head structural block as a variable 
        $headBlock = Mage::app()->getLayout()->getBlock('head');
        
        //Gets all stores for the website
        $stores = Mage::app()->getWebsite()->getStores();
        
        //Gets current page URL
        $currentUrl = Mage::helper('core/url')->getCurrentUrl();
        
        //Test to see if the module is disabled
        if(Mage::getStoreConfig("web/alternatelinks/enable_module") != false)
        {
            //Test to make sure the native head structural block is exists
            if($headBlock)
            {
                foreach ($stores as $store) 
                {
                    //gets the store language and region in native xx_XX format
                    $lang = $store->getConfig('general/locale/code');
                    
                    //Strips parameters from the core URL which are not present in the 'actual' URL and stores in a new variable
                    $cleanUrl = preg_replace('/\?.*/', '', $store->getCurrentUrl());
                    
                    //Tests config setting in admin for the hreflang format
                    if(Mage::getStoreConfig("web/alternatelinks/hreflang_value") == 'language') {
                        
                        // Strips locale string down to th first 2 characters - matching the ISO 639-1 format
                        $lang = substr($lang, 0, 2);
                    } elseif(Mage::getStoreConfig("web/alternatelinks/hreflang_value") == 'language-region') {
                        
                        // Replaces the native Magento '_' with a '-' to match the ISO 3166-1 Alpha 2 format
                        $lang = preg_replace("/[\s_]/", "-", $lang);
                    }
                    
                    //Test to see if store in the array is not the current store (to show alternates only - not 'this' store)
                    if($cleanUrl != $currentUrl) {
                        
                        //Output the rel link using the native addLinkRel() method
                        $headBlock->addLinkRel('alternate"' . ' hreflang="' . $lang, $cleanUrl);
                    }
                }
            }
            return $this;
        }
    }
}