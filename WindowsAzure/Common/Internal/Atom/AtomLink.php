<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");;
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace WindowsAzure\Common\Internal\Atom;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;

/**
 * This class constructs HTTP requests and receive HTTP responses for service bus.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class AtomLink
{
    /**
     * The undefined content. 
     *
     * @var string  
     */
    protected $_undefinedContent;

    /**
     * The HREF of the link. 
     *
     * @var string  
     */
    protected $_href;

    protected $_rel;

    protected $_type;

    protected $_hreflang;

    protected $_title;

    protected $_length;

     
    /** 
     * Creates a AtomLink instance with specified text.
     *
     * @param string $text The text of the atomLink.
     */
    public function __construct()
    {
    }

    /**
     * Parse an ATOM Link xml. 
     * 
     * @param string $xmlString an XML based string of ATOM Link.
     */ 
    public function parseXml($xmlString)
    {
        $atomLinkXml = simplexml_load_string($xmlString);
        $attributes = (array)$atomLinkXml->attributes();

        if (array_key_exists('href', $attributes))
        {
            $this->_href = (string)$attributes['href'];
        }

        if (array_key_exists('rel', $attributes))
        {
            $this->_rel = (string)$attributes['rel'];
        }

        if (array_key_exists('type', $attributes))
        {
            $this->_type = (string)$attributes['type'];
        }

        if (array_key_exists('hreflang', $attributes))
        {
            $this->_hreflang = (string)$attributes['hreflang'];
        }

        if (array_key_exists('title', $attributes))
        {
            $this->_title = (string)$attributes['title'];
        }

        if (array_key_exists('length', $attributes))
        {
            $this->_length = (integer)$attributes['length'];
        }

        $this->_undefinedContent = (string)$atomLinkXml;
    }

    /** 
     * Gets the text of the atomLink. 
     *
     * @return string
     */
    public function getHref()
    {   
        return $this->_href;
    } 

    /**
     * Sets the text of the atomLink.
     * 
     * @param string $text The text of the atomLink.
     */
    public function setHref($href)
    {
        $this->_href = $href; 
    }

    /**
     * Gets the type of the atomLink. 
     * 
     * @return string
     */
    public function getRel()
    {
        return $this->_rel;
    }

    /**
     * Sets the type of the atomLink. 
     * 
     * @param string $type The type of the atomLink.
     */
    public function setRel($rel)
    {
        $this->_rel = $rel;
    }

    public function getType()
    {
        return $this->_type;
    }

    public function setType($type)
    {
        $this->_type = $type;
    }

    public function getHrefLang()
    {
        return $this->_hrefLang;
    }

    public function setHrefLang($hrefLang)
    {
        $this->_hrefLang = $hrefLang;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function setTitle($title)
    {
        $this->_title = $title;
    }

    public function getLength() 
    {
        return $this->_length;
    }

    public function setLength($length)
    {
        $this->_length = $length;
    }

    public function getUndefinedContent()
    {
        return $this->_undefinedContent;
    }

    public function setUndefinedContent($undefinedContent)
    {
        $this->_undefinedContent = $undefinedContent;
    }

    /** 
     * Gets an XML representing the atomLink. 
     * 
     * return string
     */
    public function toXml()
    {
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $xmlWriter->startElement('atom:atomLink');
        if (!empty($this->_href))
        {
            $xmlWriter->writeAttribute('href', $this->_href);
        }

        if (!empty($this->_rel))
        {
            $xmlWriter->writeAttribute('rel', $this->_rel);
        }

        if (!empty($this->_type))
        {
            $xmlWriter->writeAttribute('type', $this->_type);
        }

        if (!empty($this->_hreflang))
        {
            $xmlWriter->writeAttribute('hreflang', $this->_hreflang);
        }

        if (!empty($this->_title))
        {
            $xmlWriter->writeAttribute('title', $this->_title);
        }

        if (!empty($this->_length))
        {
            $xmlWriter->writeAttribute('length', $this->_length);
        }

        if (!empty($this->_undefinedContent))
        {
            $xmlWriter->writeRaw($this->_undefinedContent);
        }

        $xmlWriter->endElement();

        return $xmlWriter->outputMemory();
    }
}
?>
