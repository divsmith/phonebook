<?php  namespace Phonebook\Resolvers;

use Illuminate\Contracts;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Phonebook\Parsers\Parser;

class EloquentTenantResolver implements TenantResolver {

    protected $tenant;

    public function __construct(Repository $config, Application $app, Request $request, Parser $parser)
    {
        $model = $app->make($config->get('phonebook.tenant.model', 'tenant'));
        $column = $config->get('phonebook.tenant.database.column', 'slug');
        $tenantUrlParameter = $parser->parseUrl($request->url());

        $this->tenant = $model->where($column, $tenantUrlParameter)->first();
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