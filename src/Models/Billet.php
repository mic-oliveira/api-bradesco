<?php


namespace Bradesco\Models;


class Billet extends Model
{
    private string $emission;
    private string $date_issue;
    private string $negotiation;
    private string $title;
    private int $title_type;
    private string $IOF;
    private string $due_date;
    private Interest $interest;
    private Fine $fine;
    private $client_number;
    private Document $client_document;
    private $partner_control;
    private array $discounts;
    private Person $payer;
    private Person $drawer;

    public function getEmission(): string
    {
        return $this->emission;
    }

    public function setEmission($emission): void
    {
        $this->emission = $emission;
    }

    public function getDateIssue(): string
    {
        return $this->date_issue;
    }

    public function setDateIssue($date_issue): void
    {
        $this->date_issue = $date_issue;
    }

    public function getNegotiation(): string
    {
        return $this->negotiation;
    }

    public function setNegotiation($negotiation): void
    {
        $this->negotiation = $negotiation;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getIOF(): string
    {
        return $this->IOF;
    }

    public function setIOF($IOF): void
    {
        $this->IOF = $IOF;
    }

    public function getDueDate(): string
    {
        return $this->due_date;
    }

    public function setDueDate($due_date): void
    {
        $this->due_date = $due_date;
    }

    public function getInterest(): Interest
    {
        return $this->interest;
    }

    public function setInterest(Interest $interest): void
    {
        $this->interest = $interest;
    }

    public function getFine(): Fine
    {
        return $this->fine;
    }

    public function setFine(Fine $fine): void
    {
        $this->fine = $fine;
    }

    public function getClientNumber()
    {
        return $this->client_number;
    }

    public function setClientNumber($client_number): void
    {
        $this->client_number = $client_number;
    }

    public function getClientDocument(): Document
    {
        return $this->client_document;
    }

    public function setClientDocument(Document $client_document): void
    {
        $this->client_document = $client_document;
    }

    public function getPartnerControl()
    {
        return $this->partner_control;
    }

    public function setPartnerControl($partner_control): void
    {
        $this->partner_control = $partner_control;
    }

    public function getDiscounts(): array
    {
        return $this->discounts;
    }

    public function setDiscounts($discounts): void
    {
        foreach ($discounts as $key=>$discount) {
            $this->discounts = array_merge($this->discounts,$discount);
        }
    }

    public function getPayer(): Person
    {
        return $this->payer;
    }

    public function setPayer(Person $payer): void
    {
        $this->payer = $payer;
    }

    public function getDrawer(): Person
    {
        return $this->drawer;
    }

    public function setDrawer(Person $drawer): void
    {
        $this->drawer = $drawer;
    }

}
