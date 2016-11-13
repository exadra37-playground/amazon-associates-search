<?php

namespace Exadra37_Php7\Search_Amazon\Factories;

use ApaiIO\ApaiIO;
use ApaiIO\Configuration\GenericConfiguration;
use Exadra37_Php7\Search_Amazon\Factories\Http_Factory;
use ApaiIO\ResponseTransformer\Xslt;
use Exadra37_Php7\Search_Amazon\Html;

class Amazon_Api_Factory
{
    public static function build(): ApaiIO
    {
        $Config = new GenericConfiguration;

        $headers = true;

        $xstlTemplate = <<<EOF
<xsl:stylesheet xmlns:xsl =
"http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:variable name="headers">
    <xsl:value-of select =
"/ProductInfo/Request/Args/Arg[@name='headers']/@value"/>
</xsl:variable>
<xsl:output method="text"/>
<xsl:strip-space elements="*"/>

<xsl:template match="Details">
  <!-- Add a carriage return -->
  <xsl:text>
  </xsl:text>
  <xsl:apply-templates/>
</xsl:template>

<xsl:template match="*">
  <xsl:if test="$headers = 'yes'">
    <xsl:value-of select="name()"/>
    <xsl:text>: </xsl:text>
  </xsl:if>
  <xsl:apply-templates/>
  <xsl:text>
  </xsl:text>
</xsl:template>

<!-- Just pass along contents.-->
<xsl:template match="ProductInfo">
  <xsl:apply-templates/>
</xsl:template>

<xsl:template match="Artist | Author">
  <xsl:apply-templates/>
  <xsl:if test="position() != last()">
    <xsl:text>, </xsl:text>
  </xsl:if>
</xsl:template>

<!-- Suppress -->
<xsl:template match="Request | ImageUrlSmall |
ImageUrlMedium | ImageUrlLarge | ListPrice | Asin |
UsedPrice | TotalResults | TotalPages | Mode |
RelevanceRank "/>
</xsl:stylesheet>
EOF;

        $Config->setCountry('co.uk')
               ->setAccessKey('AKIAJ4DGSKLONNFEEZ4Q')
               ->setSecretKey('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')
               ->setAssociateTag('exadra37com-21')
               ->setRequest(Http_Factory::build())
               ->setResponseTransformer(new Xslt($xstlTemplate));

        return new ApaiIO($Config);
    }
}
