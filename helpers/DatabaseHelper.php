<?php
/**
 * Created by PhpStorm.
 * User: masgeek
 * Date: 21-Feb-18
 * Time: 14:39
 */

namespace helpers;

use Medoo\Medoo;

$root_dir = dirname(dirname(__FILE__));


require_once $root_dir . '/vendor/autoload.php';

/**
 * Class DatabaseHelper
 * @package helpers
 */
class DatabaseHelper
{
    /**
     * @var $dbh \ADOConnection
     */
    public $dbh;

    public function __construct($dbHost = '127.0.0.1', $user = 'muthoni', $pwd = 'andalite6', $db = 'XE', $port = 1521, $debug = false)
    {


        $this->dbh = NewADOConnection('oci8');
        $this->dbh->Connect(FALSE, $user, $pwd, '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = ' . $dbHost . ')(PORT = ' . $port . ')) (CONNECT_DATA = (SERVICE_NAME = ' . $db . ') (SID = ' . $db . ')))');
        $this->dbh->debug = $debug;
    }

    public function WriteCardTransaction(array $cardData)
    {
        /* @var $db \ADOConnection */

        $REG_NUMBER = 'C23/12123/75';
        $RECEIPT_NUMBER = date('YmdHis');
        $TRANS_AMOUNT = '100';
        $ACADEMIC_PERIOD = '2018/2019';
        $PAY_MODE = 'CARD';
        $COLLECTION_POINT = 'WEB';
        $USERID = $this->dbh->user;
        $CHQ_NO = '456456';
        $CHQ_TYPE = '456456';
        $BANK = 'BBK';
        $BRANCH = 'CARD';
        $DRAWER = 'CARD';
        $ACCT_NO = 'CARD';
        $AUTHORIZE = '0';
        $RECEIPT_STATUS = '456456';
        $RECEIPT_REF = '456456';
        $LEVEL_OF_STUDY = 1;
        $SERIAL_NUMBER = '456456';
        $TRANS_TYPE = '456456';
        $TRANS_ID = '456456';
        $EXCHANGE_RATE = 1;
        $TRANS_DATE = $this->dbh->DBDate('2013-01-01');
        $ENTRY_DATE = $this->dbh->DBDate('2013-01-01');
        $AUTHORIZE_DATE = $this->dbh->DBDate('2013-01-01');
        $DEPOSIT_DATE = $this->dbh->DBDate('2013-01-01');

        $insertQuery = <<<QUERY
INSERT INTO "MUTHONI"."FEE_PAYMENTS" (
	REG_NUMBER,
	RECEIPT_NUMBER,
	TRANS_AMOUNT,
	ACADEMIC_PERIOD,
	PAY_MODE,
	COLLECTION_POINT,
	USERID,
	CHQ_NO,
	CHQ_TYPE,
	BANK,
	BRANCH,
	DRAWER,
	ACCT_NO,
	AUTHORIZE,
	RECEIPT_STATUS,
	RECEIPT_REF,
	LEVEL_OF_STUDY,
	SERIAL_NUMBER,
	TRANS_TYPE,
	TRANS_ID,
	EXCHANGE_RATE,
	TRANS_DATE,
    ENTRY_DATE,
    AUTHORIZE_DATE,
    DEPOSIT_DATE
)
VALUES
	(
    '$REG_NUMBER',
    '$RECEIPT_NUMBER',
    '$TRANS_AMOUNT',
    '$ACADEMIC_PERIOD',
    '$PAY_MODE',
    '$COLLECTION_POINT',
    '$USERID',
    '$CHQ_NO',
    '$CHQ_TYPE',
    '$BANK',
    '$BRANCH',
    '$DRAWER',
    '$ACCT_NO',
    '$AUTHORIZE',
    '$RECEIPT_STATUS',
    '$RECEIPT_REF',
    '$LEVEL_OF_STUDY',
    '$SERIAL_NUMBER',
    '$TRANS_TYPE',
    '$TRANS_ID',
    '$EXCHANGE_RATE',
    $TRANS_DATE,
    $ENTRY_DATE,
    $AUTHORIZE_DATE,
    $DEPOSIT_DATE
	)
QUERY;

        $result = $this->dbh->Execute($insertQuery);

        return $result;
    }

    public
    function WriteMpesaTransaction(array $arrayData)
    {
        $result = 0;
    }

    protected
    function CheckTransaction($checkoutID)
    {
        $data = $this->dbh->select('mpesa', '*', ['checkoutRequestID' => $checkoutID]);

        return count($data) > 0 ? $data[0] : null;

    }

    protected
    function UpdateToTable($checkoutID, array $arrayData)
    {

    }

    protected
    function InsertToTable(array $arrayData)
    {
    }
}