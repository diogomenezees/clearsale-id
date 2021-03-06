<?php

namespace RodrigoPedra\ClearSaleID\Entity\Request;

use DateTime;
use XMLWriter;
use RodrigoPedra\ClearSaleID\Entity\XmlEntityInterface;

class CustomerShippingData extends AbstractCustomer implements XmlEntityInterface
{
    /**
     * @param string        $id
     * @param string        $type
     * @param string        $legalDocument
     * @param string        $name
     * @param Address       $address
     * @param Phone         $phone
     *
     * @param DateTime|null $birthDate
     *
     * @return CustomerShippingData
     */
    public static function create(
        $id,
        $type,
        $legalDocument,
        $name,
        Address $address,
        $phone,
        DateTime $birthDate = null
    ) {
        $instance = new self;

        $instance->setId( $id );
        $instance->setType( $type );
        $instance->setLegalDocument1( $legalDocument );
        $instance->setName( $name );
        $instance->setAddress( $address );
        $instance->addPhone( $phone );

        if (!empty( $birthDate )) {
            $instance->setBirthDate( $birthDate );
        }

        return $instance;
    }

    public function toXML( XMLWriter $XMLWriter )
    {
        $XMLWriter->startElement( 'DadosEntrega' );

        parent::toXML( $XMLWriter );

        $XMLWriter->endElement();
    }
}
