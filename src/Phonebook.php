<?php  namespace Phonebook; 

use Phonebook\Resolvers\TenantResolver;

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