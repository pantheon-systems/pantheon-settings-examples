set -x
set -e
if [ ! -e redis-2.4.18/src/redis-server ]; then
  wget http://redis.googlecode.com/files/redis-2.4.18.tar.gz
  tar xzf redis-2.4.18.tar.gz
  cd redis-2.4.18
  make;
fi
