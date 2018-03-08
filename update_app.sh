#!/bin/bash  
git fetch --all
git reset --hard origin/cvx_doutorhj
git pull origin cvx_doutorhj
exec bash
