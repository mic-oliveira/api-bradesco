<?php


namespace Bradesco\Models;


class Billet
{
    private $emission;
    private $date_issue;
    private $negotiation;
    private $title;
    private $IOF;
    private $due_date;
    private $interest;
    private $fine;
    private $client_number;
    private $client_document;
    private $partner_control;
    private $discounts;

    /**
     * @return mixed
     */
    public function getEmission()
    {
        return $this->emission;
    }

    /**
     * @param mixed $emission
     */
    public function setEmission($emission): void
    {
        $this->emission = $emission;
    }

    /**
     * @return mixed
     */
    public function getDateIssue()
    {
        return $this->date_issue;
    }

    /**
     * @param mixed $date_issue
     */
    public function setDateIssue($date_issue): void
    {
        $this->date_issue = $date_issue;
    }

    /**
     * @return mixed
     */
    public function getNegotiation()
    {
        return $this->negotiation;
    }

    /**
     * @param mixed $negotiation
     */
    public function setNegotiation($negotiation): void
    {
        $this->negotiation = $negotiation;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getIOF()
    {
        return $this->IOF;
    }

    /**
     * @param mixed $IOF
     */
    public function setIOF($IOF): void
    {
        $this->IOF = $IOF;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * @param mixed $due_date
     */
    public function setDueDate($due_date): void
    {
        $this->due_date = $due_date;
    }

    /**
     * @return mixed
     */
    public function getInterest(): Interest
    {
        return $this->interest;
    }

    /**
     * @param mixed $interest
     */
    public function setInterest(Interest $interest): void
    {
        $this->interest = $interest;
    }

    /**
     * @return mixed
     */
    public function getFine(): Fine
    {
        return $this->fine;
    }

    /**
     * @param mixed $fine
     */
    public function setFine(Fine $fine): void
    {
        $this->fine = $fine;
    }

    /**
     * @return mixed
     */
    public function getClientNumber()
    {
        return $this->client_number;
    }

    /**
     * @param mixed $client_number
     */
    public function setClientNumber($client_number): void
    {
        $this->client_number = $client_number;
    }

    /**
     * @return mixed
     */
    public function getClientDocument(): Document
    {
        return $this->client_document;
    }

    /**
     * @param mixed $client_document
     */
    public function setClientDocument(Document $client_document): void
    {
        $this->client_document = $client_document;
    }

    /**
     * @return mixed
     */
    public function getPartnerControl()
    {
        return $this->partner_control;
    }

    /**
     * @param mixed $partner_control
     */
    public function setPartnerControl($partner_control): void
    {
        $this->partner_control = $partner_control;
    }


    /*
     * Discount Array
     */
    public function getDiscounts(): array
    {
        return $this->discounts;
    }

    /*
     * Discount array
     */
    public function setDiscounts($discounts): void
    {
        foreach ($discounts as $key=>$discount) {
            $this->discounts = array_merge($this->discounts,$discount);
        }
    }

}
