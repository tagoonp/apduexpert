var authen = {
  init: function(){
    this.check_current_user()
  },
  check_current_user: function(){
    if(curr_user == null){
      if(page_index == 'index.html'){
        window.location = 'login.html'
      }
    }
  },
  logout: function(){
    window.localStorage.removeItem(sys + 'uid')
    window.localStorage.removeItem(sys + 'role')
    window.location = '../index.html'
  }
}

authen.init()
