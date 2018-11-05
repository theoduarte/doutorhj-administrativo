#!/bin/bash  
echo @prev | sudo -S chmod 777 -R app/
sudo chmod 777 -R database/
sudo chmod 777 -R resources/
sudo chmod 777 -R storage/
sudo chmod 777 -R routes/

exec bash
