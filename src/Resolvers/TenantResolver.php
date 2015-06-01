<?php  namespace Phonebook\Resolvers; 

interface TenantResolver {

    /**
     * @return int | null
     */
    public function getTenantId();
}