<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Transaction;

use SeBuDesign\Buckaroo\Helpers\StatusCodesHelper;
use SeBuDesign\Buckaroo\Soap\Types\Responses\Common\BodyInterface;
use SeBuDesign\Buckaroo\Soap\Types\Responses\Common\ConsumerMessage\ConsumerMessageTrait;
use SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Service\ServicesTrait;
use SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Status\StatusTrait;

class Body implements BodyInterface
{
    use ConsumerMessageTrait, StatusTrait, ServicesTrait;

    /**
     * The transaction key
     *
     * @var string
     */
    protected $Key;

    /**
     * The invoice number
     *
     * @var string
     */
    protected $Invoice;

    /**
     * The order number
     *
     * @var string
     */
    protected $Order;

    /**
     * The service code
     *
     * @var string
     */
    protected $ServiceCode;

    /**
     * The status code object
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Status\Status
     */
    protected $Status;

    /**
     * The test mode boolean
     *
     * @var boolean
     */
    protected $IsTest;

    /**
     * The request currency
     *
     * @var string
     */
    protected $Currency;

    /**
     * The debit amount
     *
     * @var float
     */
    protected $AmountDebit;

    /**
     * The credit amount
     *
     * @var float
     */
    protected $AmountCredit;

    /**
     * The transaction type
     *
     * @var string
     */
    protected $TransactionType;

    /**
     * The required action object
     *
     * @var RequiredAction
     */
    protected $RequiredAction;

    /**
     * The mutation type
     *
     * @var string
     */
    protected $MutationType;

    /**
     * The consumer message object
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\ConsumerMessage\ConsumerMessage
     */
    protected $ConsumerMessage;

    /**
     * The issuing country
     *
     * @var string
     */
    protected $IssuingCountry;

    /**
     * Is this the start of a recurring payment?
     *
     * @var boolean
     */
    protected $StartRecurrent;

    /**
     * Was the payment a recurring payment?
     *
     * @var boolean
     */
    protected $Recurring;

    /**
     * The name of the customer if retrievable
     *
     * @var string
     */
    protected $CustomerName;

    /**
     * A hash, which uniquely identifies the payer.
     *
     * @var string
     */
    protected $PayerHash;

    /**
     * The response services
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Service\Services
     */
    protected $Services;

    /**
     * The custom parameters
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter\CustomParameters
     */
    protected $CustomParameters;

    /**
     * The additional parameters
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Parameter\AdditionalParameters
     */
    protected $AdditionalParameters;

    /**
     * The request errors
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Responses\Common\Error\RequestErrors
     */
    protected $RequestErrors;

    /**
     * The payment key, used to track payment attempts in the payment plaza
     *
     * @var string
     */
    protected $PaymentKey;

    /**
     * Is the transaction cancelable?
     *
     * @var boolean
     */
    protected $IsCancelable;

    /**
     * Get the transaction key
     *
     * @return string
     */
    public function getTransactionKey()
    {
        return $this->Key;
    }

    /**
     * Get the invoice number
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->Invoice;
    }

    /**
     * Get the order number
     *
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->Order;
    }

    /**
     * Get the service code
     *
     * @return string
     */
    public function getServiceCode()
    {
        return $this->ServiceCode;
    }

    /**
     * Is the response a test response?
     *
     * @return bool
     */
    public function isInTestMode()
    {
        return $this->IsTest;
    }

    /**
     * Get the request currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->Currency;
    }

    /**
     * Get the amount
     *
     * @return float
     */
    public function getAmount()
    {
        $fAmount = $this->getAmountCredit();
        if ($this->getAmountDebit()) {
            $fAmount = $this->getAmountDebit();
        }

        return $fAmount;
    }

    /**
     * Get the amount debit
     *
     * @return float
     */
    public function getAmountDebit()
    {
        return $this->AmountDebit;
    }

    /**
     * Get the amount credit
     *
     * @return float
     */
    public function getAmountCredit()
    {
        return $this->AmountCredit;
    }

    /**
     * Get the transaction type
     *
     * @return string
     */
    public function getTransactionType()
    {
        return $this->TransactionType;
    }

    /**
     * Does the response has a required action?
     *
     * @return bool
     */
    public function hasRequiredAction()
    {
        return $this->RequiredAction !== null;
    }

    /**
     * Get the required action object
     *
     * @return \SeBuDesign\Buckaroo\Soap\Types\Responses\Transaction\RequiredAction
     */
    public function getRequiredActionObject()
    {
        return $this->RequiredAction;
    }

    /**
     * Get the required action type
     *
     * @return string
     */
    public function getRequiredActionType()
    {
        return $this->getRequiredActionObject()->getType();
    }

    /**
     * Does the consumer has to be redirected?
     *
     * @return bool
     */
    public function isRedirectAction()
    {
        return ($this->getRequiredActionObject()->getType() === RequiredAction::TYPE_REDIRECT);
    }

    /**
     * Get the redirect url
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->getRequiredActionObject()->getRedirectUrl();
    }

    /**
     * Get the mutation type
     *
     * @return string
     */
    public function getMutationType()
    {
        return $this->MutationType;
    }

    /**
     * Get the issuing country
     *
     * @return string
     */
    public function getIssuingCountry()
    {
        return $this->IssuingCountry;
    }

    /**
     * Is this the start of a recurring payment?
     *
     * @return boolean
     */
    public function getStartRecurrent()
    {
        return $this->StartRecurrent;
    }

    /**
     * Was the payment a recurring payment?
     *
     * @return boolean
     */
    public function getRecurring()
    {
        return $this->Recurring;
    }

    /**
     * Does the response have errors?
     *
     * @return bool
     */
    public function hasErrors()
    {
        return $this->RequestErrors !== null && $this->RequestErrors->hasErrors();
    }

    /**
     * Is the transaction cancelable?
     *
     * @return bool
     */
    public function isCancelable()
    {
        return $this->IsCancelable;
    }

    /**
     * Is the current status successful ?
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return StatusCodesHelper::isSuccessful($this->getStatusCode());
    }

    /**
     * Is the current status pending ?
     *
     * @return bool
     */
    public function isPending()
    {
        return StatusCodesHelper::isPending($this->getStatusCode());
    }

    /**
     * Is the current status failed ?
     *
     * @return bool
     */
    public function isFailed()
    {
        return StatusCodesHelper::isFailed($this->getStatusCode());
    }

    /**
     * Is the current status cancelled ?
     *
     * @return bool
     */
    public function isCancelled()
    {
        return StatusCodesHelper::isCancelled($this->getStatusCode());
    }

    /**
     * Is the current status rejected ?
     *
     * @return bool
     */
    public function isRejected()
    {
        return StatusCodesHelper::isRejected($this->getStatusCode());
    }

    /**
     * Is the current status permanent ?
     *
     * @return bool
     */
    public function hasPermanentStatus()
    {
        return StatusCodesHelper::isPermanentStatus($this->getStatusCode());
    }

    /**
     * Is the current status temporary ?
     *
     * @return bool
     */
    public function hasTemporaryStatus()
    {
        return StatusCodesHelper::isTemporaryStatus($this->getStatusCode());
    }
}
