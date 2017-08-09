<?php
namespace Metaregistrar\EPP;

/**
 * Class chargeEppCheckDomainResponse
 * @package Metaregistrar\EPP
 *
<extension>
    <charge:chkData xmlns:charge="http://www.unitedtld.com/epp/charge-1.0">
        <charge:cd>
            <charge:name>greatname.TLD</charge:name>
            <charge:set>
                <charge:category name="AAAA">premium</charge:category>
                <charge:type>price</charge:type>
                <charge:amount command="create">20.0000</charge:amount>
                <charge:amount command="renew">20.0000</charge:amount>
                <charge:amount command="transfer">20.0000</charge:amount>
                <charge:amount command="update" name="restore">20.0000</charge:amount>
            </charge:set>
        </charge:cd>
    </charge:chkData>
</extension>
 */

class chargeEppCheckDomainResponse extends eppCheckDomainResponse {
    /**
     * chargeEppCheckDomainResponse constructor.
     */
    function __construct() {
        parent::__construct();
    }

    public function getChargeDomainName() {

        $xpath = $this->xPath();
        $result = $xpath->query('/epp:epp/epp:response/epp:extension/charge:chkData/charge:cd/charge:name');
        if ($result->length > 0) {
            return $result->item(0)->nodeValue;
        } else {
            return null;
        }
    }

    public function getChargeCategoryName() {
        $xpath = $this->xPath();
        $result = $xpath->query('/epp:epp/epp:response/epp:extension/charge:chkData/charge:cd/charge:set/charge:category');
        if ($result->length > 0) {
            return $result->item(0)->nodeValue;
        } else {
            return null;
        }
    }


}
