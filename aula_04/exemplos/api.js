const axios = require('axios')

const data = {
  'type': 'login',
  'user': 'edson.melo',
  'password': 'edson123'
}

axios.post('https://www.edsonmelo.com.br/api_rest/user.php', data)
  .then((res) => {
    console.log(`Status: ${res.status}`);
    console.log('Body:', res.data)
  }).catch((err) => {
    console.error(err)
  });