# Setup

In order to set up this shiat, install tailwind `npm install -D tailwindcss` and init the project `npx tailwindcss init`.

please add the line `include servers/airstreambar.nginx.conf;` after

`http {` in the file `/opt/homebrew/etc/nginx/nginx.conf` (nginx needs to be installed with homebrew)

create `airstreambar.nginx.conf` in `/opt/homebrew/etc/nginx/servers` and add the following:

```
server {
    listen 80;
    server_name 192.168.1.18;
    return 301 https://$host$request_uri;
}

server {
    listen 443 ssl;
    server_name 192.168.1.18;

    ssl_certificate /Users/jov/.ssl/192.168.1.18.pem;
    ssl_certificate_key /Users/jov/.ssl/192.168.1.18-key.pem;

    location / {
        proxy_pass http://192.168.1.18:8000; # Or wherever your PHP app is running
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
    }
}
```
