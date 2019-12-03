<?php

namespace Iamport\RestClient\Request\Escrow;

use Iamport\RestClient\Request\RequestTrait;

/**
 * Class EscrowLogisInvoice.
 *
 * @property string $company
 * @property string $invoice
 * @property mixed  $sent_at
 */
class EscrowLogisInvoice
{
    use RequestTrait;

    /**
     * @var string 택배사 코드
     */
    protected $company;

    /**
     * @var string 송장번호
     */
    protected $invoice;

    /**
     * @var mixed 발송일시
     */
    protected $sent_at;

    /**
     * EscrowLogisInvoice constructor.
     *
     * @param string $company
     * @param string $invoice
     * @param mixed  $sent_at Y-m-d H:i:s 형태의 문자열 혹은 unix timestamp
     */
    public function __construct(string $company, string $invoice, $sent_at)
    {
        date_default_timezone_set('Asia/Seoul');
        $this->company = $company;
        $this->invoice = $invoice;
        $this->setSentAt($sent_at);
    }

    /**
     * @param string $company
     */
    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    /**
     * @param string $invoice
     */
    public function setInvoice(string $invoice): void
    {
        $this->invoice = $invoice;
    }

    /**
     * @param mixed $sent_at
     */
    public function setSentAt($sent_at): void
    {
        $this->sent_at = is_numeric($sent_at) ? $sent_at : strtotime(date($sent_at));
    }
}
