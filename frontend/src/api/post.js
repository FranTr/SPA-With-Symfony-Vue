import axios from 'axios'

export default {
  create (message) {
    return axios.post(
      '/api/post/create',
      {
        message: message
      }
    )
  },
  getAll () {
    return axios.get('/api/posts')
  },
  getLogin(payload){
    return axios.post(
        '/api/security/login',
        {
          'login' : payload.login,
          'password' : payload.password
        }
    )
  }
}
