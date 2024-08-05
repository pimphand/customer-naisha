module.exports = {
  apps: [
    {
      name: 'react-app',
      script: 'serve',
      args: '-s build',
      cwd: '/var/www/html/customer-naisha/reseller',
      env: {
        PORT: 3000 // You can specify the port number if needed
      }
    }
  ]
};
