<?php 


use App\Models\Customer; 
use App\Models\Item; 
use App\Models\Estimate; 
use App\Models\Invoice; 
use App\Models\Expense; 
use App\Models\Payment; 
use App\Models\RecurringInvoice; 
use App\Models\ExchangeRateProvider; 
use App\Models\Note; 
use App\Models\TaxType; 
use App\Models\CustomField; 


return [
    /*
    * Minimum php version.
    */
    'min_php_version' => '8.2.0',

    /*
    * Minimum mysql version.
    */

    'min_mysql_version' => '5.7.7',

    /*
    * Minimum mariadb version.
    */

    'min_mariadb_version' => '10.2.7',

    /*
    * Minimum pgsql version.
    */

    'min_pgsql_version' => '9.2.0',

    /*
    * Minimum sqlite version.
    */

    'min_sqlite_version' => '3.35.0',

    /*
    * Marketplace url.
    */
    'base_url' => 'http://invoiceshelfapi.local',

    /*
    * List of languages supported by InvoiceShelf.
    */
     /*
    * List of main menu
    */
    'main_menu' => [
        [
            'title' => 'navigation.dashboard',
            'group' => 1,
            'link' => '/admin/dashboard',
            'icon' => 'HomeIcon',
            'name' => 'Dashboard',
            'owner_only' => false,
            'ability' => 'dashboard',
            'model' => '',
        ],
        [
            'title' => 'navigation.customers',
            'group' => 1,
            'link' => '/admin/customers',
            'icon' => 'UserIcon',
            'name' => 'Customers',
            'owner_only' => false,
            'ability' => 'view-customer',
            'model' => Customer::class,
        ],
        [
            'title' => 'navigation.items',
            'group' => 1,
            'link' => '/admin/items',
            'icon' => 'StarIcon',
            'name' => 'Items',
            'owner_only' => false,
            'ability' => 'view-item',
            'model' => Item::class,
        ],
        [
            'title' => 'navigation.estimates',
            'group' => 2,
            'link' => '/admin/estimates',
            'icon' => 'DocumentIcon',
            'name' => 'Estimates',
            'owner_only' => false,
            'ability' => 'view-estimate',
            'model' => Estimate::class,
        ],
        [
            'title' => 'navigation.invoices',
            'group' => 2,
            'link' => '/admin/invoices',
            'icon' => 'DocumentTextIcon',
            'name' => 'Invoices',
            'owner_only' => false,
            'ability' => 'view-invoice',
            'model' => Invoice::class,
        ],
        [
            'title' => 'navigation.recurring-invoices',
            'group' => 2,
            'link' => '/admin/recurring-invoices',
            'icon' => 'DocumentTextIcon',
            'name' => 'Recurring Invoices',
            'owner_only' => false,
            'ability' => 'view-recurring-invoice',
            'model' => RecurringInvoice::class,
        ],
        [
            'title' => 'navigation.payments',
            'group' => 2,
            'link' => '/admin/payments',
            'icon' => 'CreditCardIcon',
            'name' => 'Payments',
            'owner_only' => false,
            'ability' => 'view-payment',
            'model' => Payment::class,
        ],
        [
            'title' => 'navigation.expenses',
            'group' => 2,
            'link' => '/admin/expenses',
            'icon' => 'CalculatorIcon',
            'name' => 'Expenses',
            'owner_only' => false,
            'ability' => 'view-expense',
            'model' => Expense::class,
        ],
        // TODO: remove env check once the module management os implemented.
        ...(
            env('APP_ENV', 'production') == 'development' ? [
                [
                    'title' => 'navigation.modules',
                    'group' => 3,
                    'link' => '/admin/modules',
                    'icon' => 'PuzzlePieceIcon',
                    'name' => 'Modules',
                    'owner_only' => true,
                    'ability' => '',
                    'model' => '',
                ],
            ] : []
        ),
        [
            'title' => 'navigation.users',
            'group' => 3,
            'link' => '/admin/users',
            'icon' => 'UsersIcon',
            'name' => 'Users',
            'owner_only' => true,
            'ability' => '',
            'model' => '',
        ],
        [
            'title' => 'navigation.reports',
            'group' => 3,
            'link' => '/admin/reports',
            'icon' => 'ChartBarIcon',
            'name' => 'Reports',
            'owner_only' => false,
            'ability' => 'view-financial-reports',
            'model' => '',
        ],
        [
            'title' => 'navigation.settings',
            'group' => 3,
            'link' => '/admin/settings',
            'icon' => 'CogIcon',
            'name' => 'Settings',
            'owner_only' => false,
            'ability' => '',
            'model' => '',
        ],
    ],

    /*
    * List of setting menu
    */
    'setting_menu' => [
        [
            'title' => 'settings.menu_title.account_settings',
            'group' => '',
            'name' => 'Account Settings',
            'link' => '/admin/settings/account-settings',
            'icon' => 'UserIcon',
            'owner_only' => false,
            'ability' => '',
            'model' => '',
        ],
        [
            'title' => 'settings.menu_title.company_information',
            'group' => '',
            'name' => 'Company information',
            'link' => '/admin/settings/company-info',
            'icon' => 'BuildingOfficeIcon',
            'owner_only' => true,
            'ability' => '',
            'model' => '',
        ],
        [
            'title' => 'settings.menu_title.preferences',
            'group' => '',
            'name' => 'Preferences',
            'link' => '/admin/settings/preferences',
            'icon' => 'CogIcon',
            'owner_only' => true,
            'ability' => '',
            'model' => '',
        ],
        [
            'title' => 'settings.menu_title.customization',
            'group' => '',
            'name' => 'Customization',
            'link' => '/admin/settings/customization',
            'icon' => 'PencilSquareIcon',
            'owner_only' => true,
            'ability' => '',
            'model' => '',
        ],
        [
            'title' => 'settings.menu_title.pdf_generation',
            'group' => '',
            'name' => 'PDF Generation',
            'link' => '/admin/settings/pdf-generation',
            'icon' => 'DocumentIcon',
            'owner_only' => true,
            'ability' => '',
            'model' => '',
        ],
        [
            'title' => 'settings.roles.title',
            'group' => '',
            'name' => 'Roles',
            'link' => '/admin/settings/roles-settings',
            'icon' => 'UserGroupIcon',
            'owner_only' => true,
            'ability' => '',
            'model' => '',
        ],
        [
            'title' => 'settings.menu_title.exchange_rate',
            'group' => '',
            'name' => 'Exchange Rate Provider',
            'link' => '/admin/settings/exchange-rate-provider',
            'icon' => 'BanknotesIcon',
            'owner_only' => false,
            'ability' => 'view-exchange-rate-provider',
            'model' => ExchangeRateProvider::class,
        ],
        [
            'title' => 'settings.menu_title.notifications',
            'group' => '',
            'name' => 'Notifications',
            'link' => '/admin/settings/notifications',
            'icon' => 'BellIcon',
            'owner_only' => true,
            'ability' => '',
            'model' => '',
        ],
        [
            'title' => 'settings.menu_title.tax_types',
            'group' => '',
            'name' => 'Tax types',
            'link' => '/admin/settings/tax-types',
            'icon' => 'CheckCircleIcon',
            'owner_only' => false,
            'ability' => 'view-tax-type',
            'model' => TaxType::class,
        ],
        [
            'title' => 'settings.menu_title.payment_modes',
            'group' => '',
            'name' => 'Payment modes',
            'link' => '/admin/settings/payment-mode',
            'icon' => 'CreditCardIcon',
            'owner_only' => false,
            'ability' => 'view-payment',
            'model' => Payment::class,
        ],
        [
            'title' => 'settings.menu_title.custom_fields',
            'group' => '',
            'name' => 'Custom fields',
            'link' => '/admin/settings/custom-fields',
            'icon' => 'CubeIcon',
            'owner_only' => false,
            'ability' => 'view-custom-field',
            'model' => CustomField::class,
        ],
        [
            'title' => 'settings.menu_title.notes',
            'group' => '',
            'name' => 'Notes',
            'link' => '/admin/settings/notes',
            'icon' => 'ClipboardDocumentCheckIcon',
            'owner_only' => false,
            'ability' => 'view-all-notes',
            'model' => Note::class,
        ],
        [
            'title' => 'settings.menu_title.expense_category',
            'group' => '',
            'name' => 'Expense Category',
            'link' => '/admin/settings/expense-category',
            'icon' => 'ClipboardDocumentListIcon',
            'owner_only' => false,
            'ability' => 'view-expense',
            'model' => Expense::class,
        ],
        [
            'title' => 'settings.mail.mail_config',
            'group' => '',
            'name' => 'Mail Configuration',
            'link' => '/admin/settings/mail-configuration',
            'icon' => 'EnvelopeIcon',
            'owner_only' => true,
            'ability' => '',
            'model' => '',
        ],
        [
            'title' => 'settings.menu_title.file_disk',
            'group' => '',
            'name' => 'File Disk',
            'link' => '/admin/settings/file-disk',
            'icon' => 'FolderIcon',
            'owner_only' => true,
            'ability' => '',
            'model' => '',
        ],
        [
            'title' => 'settings.menu_title.backup',
            'group' => '',
            'name' => 'Backup',
            'link' => '/admin/settings/backup',
            'icon' => 'CircleStackIcon',
            'owner_only' => true,
            'ability' => '',
            'model' => '',
        ],
        [
            'title' => 'settings.menu_title.update_app',
            'group' => '',
            'name' => 'Update App',
            'link' => '/admin/settings/update-app',
            'icon' => 'ArrowPathIcon',
            'owner_only' => true,
            'ability' => '',
            'model' => '',
        ],
    ],
];