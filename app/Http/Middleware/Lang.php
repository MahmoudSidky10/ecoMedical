<?php

namespace App\Http\Middleware;

use Closure;

class Lang
{
    private $defaultLang = "ar";
    private $appLanguages = ["ar", "en"];

    public function handle($request, Closure $next)
    {
        if ($request->header("lang")) {
            $request["lang"] = $request->header("lang");
        }
        if ($request->lang) {
            if (in_array($request->lang, $this->appLanguages)) {
                $this->setLocaleLang($request->lang);
            } else {
                $this->setLocaleLang($this->defaultLang);
            }
        } else {
            if (session()->has('lang')) {
                $this->setLocaleLang(session()->get('lang'));
            } else {
                $this->setLocaleLang($this->defaultLang);
            }
        }
        return $next($request);
    }

    public function setLocaleLang($lang)
    {
        session()->put('lang', $lang);
        app()->setLocale($lang);
    }
}
