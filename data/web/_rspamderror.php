<?php
$redis = new Redis();
try {
  if (!empty(getenv('REDIS_SLAVEOF_IP'))) {
    $redis->connect(getenv('REDIS_SLAVEOF_IP'), getenv('REDIS_SLAVEOF_PORT'));
  }
  else {
    $redis->connect('redis-zynerone', 6379);
  }
}
catch (Exception $e) {
  exit;
}
header('Content-Type: application/json');
echo '{"error":"Unauthorized"}';
error_log("Rspamd UI: Invalid password by " . $_SERVER['REMOTE_ADDR']);
$redis->publish("NETFILTER_CHANNEL", "Rspamd UI: Invalid password by " . $_SERVER['REMOTE_ADDR']);
