
set -e

if [ -d "./runtime" ]; then
    echo "/runtime exists."
else
    mkdir ./runtime
fi

if [ -d "./web/assets" ]; then
    echo "/web/assets exists."
else
    mkdir ./web/assets
fi
chmod 0777 ./runtime
chmod 0777 ./web/assets

#Update Composer to v2
composer self-update --2

# Install Composer modules
composer install


exec "$@"
