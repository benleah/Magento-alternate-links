##Alternate Links for Magento

Many Magento websites serve users from around the world with content translated or targeted to users in a certain region, however without alternate links Google may not serve the right content to the right region &mdash; or worse &mdash; interpret multiple store views as duplicate content. Google uses the `rel="alternate"` and  `hreflang="x"` attributes to serve the correct language or regional URL in Search results.

Easily add alternate links to the head of international Magento stores to help Google better understand which content to serve to which country, avoiding duplicate content issues where the same products and CMS pages are available in multiple store views.

###The &lt;head&gt;

Alternate Links for Magento adds an alternate link to the Magento head, specifying an `hreflang=""` value automatically assigned based on each store&rsquo;s locale configuration (SYSTEM > CONFIGURATION > WEB > LOCALE OPTIONS).

    <link rel="alternate" hreflang="en-GB" href="http://www.yourmagentostore.com/en/any-url/" />

The value of the `hreflang` attribute can be language only (in ISO 639-1 format, e.g. 'en') or optionally include the region (in ISO 3166-1 Alpha 2 format, e.g. 'en-GB'). To find out more about language and region formats, [click here](https://support.google.com/webmasters/answer/189077?hl=en).