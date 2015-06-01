<?php  namespace Phonebook\Resolvers; 

class EloquentTenantResolver implements TenantResolver {

    protected $tenant;

    protected $config;

    public function __construct(Repository $config, Application $app, Request $request)
    {
        $this->config = $config;

        $this->tenant = $app->make($this->config->get('phonebook.tenant.model'))->where($this->config->get('phonebook.tenant.database.column', 'slug'),
            $request->route($this->config->get('phonebook.tenant.route.parameter', 'tenant'))
        )->first();
    }

    /**
     * Get the ID for the tenant the request is directed to.
     *
     * @return integer
     */
    public function getTenantId()
    {
        return $this->tenant->id;
    }
}