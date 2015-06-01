<?php namespace Phonebook\Middleware;

use Closure;
use Phonebook\Resolvers\TenantResolver;

class Phonebook extends \Phonebook\Phonebook {

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
