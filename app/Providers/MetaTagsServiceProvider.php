<?php

namespace App\Providers;

use Butschster\Head\Contracts\MetaTags\MetaInterface;
use Butschster\Head\Contracts\Packages\ManagerInterface;
use Butschster\Head\Facades\PackageManager;
use Butschster\Head\MetaTags\Entities\Favicon;
use Butschster\Head\MetaTags\Meta;
use Butschster\Head\Packages\Package;
use Butschster\Head\Providers\MetaTagsApplicationServiceProvider as ServiceProvider;

class MetaTagsServiceProvider extends ServiceProvider
{
    protected function packages()
    {
        PackageManager::create('favicons', function (Package $package) {
            $sizes = ['16x16', '32x32', '64x64'];

            foreach ($sizes as $size) {
                $package->addTag(
                    'favicon.' . $size,
                    new Favicon('/favicon/favicon-' . $size . '.png', [
                        'sizes' => $size,
                    ])
                );
            }

            $meta_keywords = [
                '199x',
                'fun',
                'relax',
            ];
            $meta_keywords = implode(',', $meta_keywords);

            $meta_description = 'Blog cá nhân giải trí';

            $package->addLink('apple-touch-icon', ['sizes' => '180x180', 'href' => '/favicon/apple-touch-icon.png'])
                ->addLink('manifest', ['href' => '/favicon/site.webmanifest'])
                ->addLink('mask-icon', ['href' => '/favicon/safari-pinned-tab.svg', 'color' => '#0088cc'])
                ->addLink('shortcut icon', ['href' => '/favicon/favicon.ico'])
                ->addMeta('msapplication-TileColor', ['content' => '#0088cc'])
                ->addMeta('msapplication-config', ['content' => '/favicon/browserconfig.xml'])
                ->addMeta('theme-color', ['content' => '#0088cc'])
                ->addMeta('keywords', ['content' => $meta_keywords])
                ->addMeta('description', ['content' => $meta_description]);
        });

        PackageManager::create('admin_css', function (Package $package) {
            $package->addStyle('source_sans_pro', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')
                ->addStyle('fontawesome', '/backend/css/fontawesome.min.css')
                ->addStyle('select2', '/backend/plugins/select2/css/select2.min.css')
                ->addStyle('datepicker', '/backend/plugins/daterangepicker/css/daterangepicker.css')
                ->addStyle('adminlte', '/backend/css/adminlte.min.css');
        });

        PackageManager::create('fullcalendar_css', function (Package $package) {
            $package->addStyle('fullcalendar-core', '/backend/plugins/fullcalendar/core/main.min.css')
                ->addStyle('fullcalendar-bootstrap', '/backend/plugins/fullcalendar/bootstrap/main.min.css')
                ->addStyle('fullcalendar-daygrid', '/backend/plugins/fullcalendar/daygrid/main.min.css')
                ->addStyle('fullcalendar-timegrid', '/backend/plugins/fullcalendar/timegrid/main.min.css');
        });
    }

    // if you don't want to change anything in this method just remove it
    protected function registerMeta(): void
    {
        $this->app->singleton(MetaInterface::class, function () {
            $meta = new Meta(
                $this->app[ManagerInterface::class],
                $this->app['config']
            );

            // It just an imagination, you can automatically
            // add favicon if it exists
            // if (file_exists(public_path('favicon.ico'))) {
            //    $meta->setFavicon('/favicon.ico');
            // }

            // This method gets default values from config and creates tags, includes default packages, e.t.c
            // If you don't want to use default values just remove it.
            $meta->initialize();

            return $meta;
        });
    }
}
