<?php

namespace Libraries;

class AppLoader
{
    public static function load(): void
    {
        $loader = new self;
        $loader->loadAutoLoad();
        $loader->loadDatabaseDriver(env('DATABASE_DRIVER'));
        $loader->loadRequest();
        $loader->loadModels();
        $loader->loadController();
        $loader->loadMails();
        $loader->loadSession();
        $loader->loadRedirectResponse();
        $loader->loadSupport();
        $loader->loadExternalHelpers();
    }

    private function loadExternalHelpers(): void
    {
        $this->loadFiles('app/Helpers');
    }

    private function loadSupport(): void
    {
        $this->loadFiles('Libraries/Support');
    }

    private function loadRedirectResponse(): void
    {
        $this->loadFiles('Libraries/Response/HttpResponse');
        require_once assets('Libraries/Response/Response.php');
        $this->loadFiles('Libraries/Redirect');
    }

    private function loadSession(): void
    {
        require_once assets('Libraries/Session/Session.php');
    }

    private function loadMails(): void
    {
        require_once assets('Libraries/Mail/Mailable.php');
        $this->loadFiles('app/Mails');
    }

    private function loadController(): void
    {
        require_once assets('app/Http/Controllers/Controller.php');
    }

    private function loadModels(): void
    {
        require_once assets('Libraries/database_drivers/Model.php');
        $this->loadFiles('App/Models');
    }

    private function loadRequest(): void
    {
        $this->loadFiles('Libraries/Request');
    }

    private function loadDatabaseDriver($driver): void
    {
        require_once assets('Libraries/database_drivers/'.$driver.'/Builder.php');
        require_once assets('Libraries/database_drivers/'.$driver.'/Query.php');
        require_once assets('Libraries/database_drivers/'.$driver.'/DB.php');
    }

    private function loadAutoLoad(): void
    {
        $path = assets('vendor/autoload.php');
        if (file_exists($path)) {
            require_once $path;
        }
    }

    private function loadFiles($folder): void
    {
        $path = assets($folder);
        if (is_dir($path)) {
            $files = scandir($path);
            foreach ($files as $file) {
                $file_path = assets($folder.'/'.$file);
                if (is_file($file_path)) {
                    require_once $file_path;
                }
            }
        }
    }
}