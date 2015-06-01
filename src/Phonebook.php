<?php namespace Phonebook;

use Closure;
use Phonebook\Resolvers\TenantResolver;

class Phonebook {

    /**
     * @var Phonebook\Resolvers\TenantResolver
     */
    protected $tenantResolver;

    public function __construct(TenantResolver $tenantResolver)
    {
        $this->tenantResolver = $tenantResolver;
    }

    /**
     * Get the tenant ID and put it into the request's
     * attributes object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tenantId = $this->tenantResolver->getTenantId();

        $request->attributes->add(['tenantId' => $tenantId]);

        return $next($request);
    }

}
