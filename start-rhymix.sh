#!/bin/bash

echo "Starting Rhymix with Docker Compose..."
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

echo ""
echo "Services started successfully!"
echo ""
echo "Access your Rhymix site at:"
echo "  - HTTP:  http://localhost:4001"
echo "  - HTTPS: https://localhost (with self-signed certificate)"
echo ""
echo "File locations:"
echo "  - Rhymix files: ./rhymix/www/"
echo "  - NGINX config: ./rhymix/nginx/conf.d/"
echo "  - SSL certificates: ./rhymix/ssl/"
echo "  - Logs: ./rhymix/logs/"
echo ""
echo "To stop services: docker compose down"
echo "To view logs: docker compose logs -f"