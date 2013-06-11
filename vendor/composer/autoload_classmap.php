<?php

// autoload_classmap.php generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'AddPromotionsToCellplans' => $baseDir . '/app/database/migrations/2013_06_08_092640_add_promotions_to_cellplans.php',
    'Backend\\CategoryController' => $baseDir . '/app/controllers/backend/CategoryController.php',
    'Backend\\HomeController' => $baseDir . '/app/controllers/backend/HomeController.php',
    'Backend\\PartialController' => $baseDir . '/app/controllers/backend/PartialController.php',
    'Backend\\ProductController' => $baseDir . '/app/controllers/backend/ProductController.php',
    'Backend\\ServiceController' => $baseDir . '/app/controllers/backend/ServiceController.php',
    'BaseController' => $baseDir . '/app/controllers/BaseController.php',
    'Cartalyst\\Sentry\\Groups\\GroupExistsException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
    'Cartalyst\\Sentry\\Groups\\GroupNotFoundException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
    'Cartalyst\\Sentry\\Groups\\NameRequiredException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
    'Cartalyst\\Sentry\\Throttling\\UserBannedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Throttling/Exceptions.php',
    'Cartalyst\\Sentry\\Throttling\\UserSuspendedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Throttling/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\LoginRequiredException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\PasswordRequiredException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserAlreadyActivatedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserExistsException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserNotActivatedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserNotFoundException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\WrongPasswordException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'CategoriesRepository' => $baseDir . '/app/models/CategoriesRepository.php',
    'Category' => $baseDir . '/app/models/Category.php',
    'Cellplan' => $baseDir . '/app/models/Cellplan.php',
    'Company' => $baseDir . '/app/models/Company.php',
    'CreateCategories' => $baseDir . '/app/database/migrations/2013_05_31_201056_create_categories.php',
    'CreateCellplan' => $baseDir . '/app/database/migrations/2013_06_02_195212_create_cellplan.php',
    'CreateCompany' => $baseDir . '/app/database/migrations/2013_06_03_000153_create_company.php',
    'CreateInternet' => $baseDir . '/app/database/migrations/2013_06_03_010213_create_internet.php',
    'CreateSubCategories' => $baseDir . '/app/database/migrations/2013_05_31_204219_create_sub_categories.php',
    'CreateSubcategoriesAller' => $baseDir . '/app/database/migrations/2013_06_02_184058_create_subcategories_aller.php',
    'CreateUsers' => $baseDir . '/app/database/migrations/2013_06_04_045707_create_users.php',
    'DatabaseSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'HomeController' => $baseDir . '/app/controllers/HomeController.php',
    'IlluminateQueueClosure' => $vendorDir . '/laravel/framework/src/Illuminate/Queue/IlluminateQueueClosure.php',
    'ImportCommand' => $baseDir . '/app/commands/ImportCommand.php',
    'Internet' => $baseDir . '/app/models/Internet.php',
    'MigrationCartalystSentryInstallGroups' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225929_migration_cartalyst_sentry_install_groups.php',
    'MigrationCartalystSentryInstallThrottle' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225988_migration_cartalyst_sentry_install_throttle.php',
    'MigrationCartalystSentryInstallUsers' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225921_migration_cartalyst_sentry_install_users.php',
    'MigrationCartalystSentryInstallUsersGroupsPivot' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot.php',
    'MysqlCategoriesRepository' => $baseDir . '/app/models/MysqlCategoriesRepository.php',
    'SessionHandlerInterface' => $vendorDir . '/symfony/http-foundation/Symfony/Component/HttpFoundation/Resources/stubs/SessionHandlerInterface.php',
    'Subcategory' => $baseDir . '/app/models/Subcategory.php',
    'TestCase' => $baseDir . '/app/tests/TestCase.php',
    'User' => $baseDir . '/app/models/User.php',
);
