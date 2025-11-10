#!/bin/bash

echo "🚀 Starting Rhymix Development Environment..."
echo ""

# Check environment variables first
echo "🔍 Validating environment configuration..."
./check-env.sh
if [ $? -ne 0 ]; then
    echo "❌ Environment validation failed!"
    exit 1
fi
echo ""

# Check if SSL certificates exist
if [ ! -f "./rhymix/ssl/localhost.crt" ]; then
    echo "SSL certificates not found. Setting up SSL first..."
    ./setup-ssl.sh
    echo ""
fi

# Set proper permissions for Rhymix files
echo "Setting permissions for Rhymix files..."
sudo chown -R www-data:www-data ./rhymix/www
sudo chmod -R 755 ./rhymix/www
sudo chmod -R 777 ./rhymix/www/files

# Start services
echo "Starting Docker Compose services..."
docker compose up -d

# Load environment variables
source .env

echo ""
echo "✅ Services started successfully!"
echo ""
echo "🌐 Access your Rhymix site at:"
echo "  - HTTP:  http://localhost:${RHYMIX_HTTP_PORT}"
echo "  - HTTPS: https://localhost:${RHYMIX_HTTPS_PORT} (with self-signed certificate)"
echo ""
echo "🗄️ Database Information:"
echo "  - Host: localhost:${DB_PORT_EXTERNAL} (external)"
echo "  - Database: ${DB_DATABASE}"
echo "  - User: ${DB_USER}"
echo "  - Password: ${DB_PASSWORD}"
echo ""
echo "📁 File locations:"
echo "  - Rhymix files: ${RHYMIX_SRC_PATH}"
echo "  - NGINX config: ${NGINX_CONFIG_PATH}"
echo "  - SSL certificates: ${SSL_CERTS_PATH}"
echo "  - Logs: ${LOGS_PATH}"
echo ""
echo "🛠️ Management commands:"
echo "  - Stop services: docker compose down"
echo "  - View logs: docker compose logs -f"
echo "  - Database access: docker exec -it ${DB_CONTAINER_NAME} mysql -u ${DB_USER} -p"