##Alternate Links for Magento

Many Magento websites serve users from around the world with content translated or targeted to users in a certain region, however without alternate links Google may not serve the right content to the right region &mdash; or worse &mdash; interpret multiple store views as duplicate content. Google uses the `rel="alternate"` and  `hreflang="x"` attributes to serve the correct language or regional URL in Search results.

Easily add alternate links to the head of international Magento stores to help Google better understand which content to serve to which country, avoiding duplicate content issues where the same products and CMS pages are available in multiple store views.

###The &lt;head&gt;

Alternate Links for Magento adds an alternate link to the Magento head for each alternate store view, specifying an `hreflang=""` value automatically assigned based on each store&rsquo;s locale configuration (SYSTEM > CONFIGURATION > WEB > LOCALE OPTIONS).

    <link rel="alternate" hreflang="xx-XX" href="http://www.yourmagentostore.com/en/any-url/" />

The value of the `hreflang` attribute can be language only (in ISO 639-1 format, e.g. 'en') or optionally include the region (in ISO 3166-1 Alpha 2 format, e.g. 'en-GB'). To find out more about language and region formats, [click here](https://support.google.com/webmasters/answer/189077?hl=en).

###Basic Setup

1. Install the module.
2. Clear the Magento Cache then log out of admin and back in.
3. Make sure your store view's language and country configurations are et correctly in SYSTEM > CONFIGURATION > GENERAL.
4. Enable the module in Magento admin (SYSTEM > CONFIGURATION > WEB > ALTERNATE LINKS). Set *Enable* to 'Yes'.
5. Select your desired `hreflang` format using the *Hreflang Format* dropdown option.