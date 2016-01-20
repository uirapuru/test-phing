set :application, "test-phing"
set :domain,      "gyman.pl"
set :deploy_to,   "/home/test-phing"
set :app_path,    "app"
set :clear_controllers, false
set :user, "deploy"

set :ssh_options, {
    :forward_agent => true,
    :auth_methods => ["publickey"],
}

default_run_options[:pty] = true

set :repository,  "git@github.com:uirapuru/test-phing.git"
set :scm,         :git
set :branch, 	   "master"
set :deploy_via,   :remote_cache
set :copy_via, :scp

set :interactive_mode, false

set :use_composer, true
set :composer_options,  "--no-progress --no-interaction --no-dev --no-ansi --verbose --prefer-dist --optimize-autoloader"
set :update_vendors, false
set :vendors_mode, "install"
set :cache_warmup, true

set :shared_files,      ["app/config/parameters.yml"]
set :shared_children,     [app_path + "/logs", web_path + "/uploads", app_path + "/spool"]

set :writable_dirs,       ["app/cache", "app/logs"]
set :webserver_user,      "www-data"
set :permission_method,   :acl
set :use_set_permissions, true

set :model_manager, "doctrine"

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set  :keep_releases,  3

set :use_sudo,  false

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL

