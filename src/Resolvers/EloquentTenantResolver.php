<?php  namespace Phonebook\Resolvers;

use Illuminate\Contracts;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class EloquentTenantResolver implements TenantResolver {

    protected $tenant;

    protected $config;

    public function __construct(Repository $config, Application $app, Request $request)
    {
        $this->config = $config;

        $model = $app->make($this->config->get('phonebook.tenant.model', 'tenant'));
        $column = $this->config->get('phonebook.tenant.database.column', 'slug');

        $matches = [];
        $pattern = '/https?:\/\/(?:([^.]*)\.)[\S]+/';
        preg_match($pattern, $request->url(), $matches);

        $tenantRouteParamter = $matches[1];

        $this->tenant = $model->where($column, $tenantRouteParamter)->first();

    }

    /**
     * Get the ID for the tenant the request is directed to.
     *
     * @return integer | null
     */
    public function getTenantId()
    {
        if ($this->tenant)
        {
            return $this->tenant->id;
        }

        return null;
    }
}