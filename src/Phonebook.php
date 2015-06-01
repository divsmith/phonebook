<?php  namespace Phonebook; 

abstract class Phonebook {

    /**
     * @var Phonebook\Resolvers\TenantResolver
     */
    protected $tenantResolver;

    public function __construct(TenantResolver $tenantResolver)
    {
        $this->tenantResolver = $tenantResolver;
    }
}