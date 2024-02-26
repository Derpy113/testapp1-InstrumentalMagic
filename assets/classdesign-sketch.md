Todo: Lägg till redan gjorda klasser (+harmonisera med övrig kommande struktur för Player mm)

class UserDAO
- countByName($username)
- getUserByUsername($username)
- createUser(string $Username, string $UserPassword)

class userprofile
- GetUsername()

class Connection
- getPDO(): PDO

class CreateAccount
- TryToCreateAccount()
- validateInput()
- validateUsername($username)
- validatePassword($password)
- GetUsernameInput()
- GetPasswordInput()
- GetUsernameError()
- GetPasswordError()

class Login
- SetLoginError()
- validateUsername($username, $password)
- GetUsernameInput()
- GetPasswordInput()
- GetLoginError()

 
PROFILE
SETTINGS

# View ----
LIBRARY ??

# Controller ----
//// most popular = most played
//   highest rated songs
////   least popular
//// latest played
////   oldest played
//   Library.searchSong
Library.findAll  #getSong
Song   #+sätt att få med sång till Player
PLAYER
  Player.loadSongData  #loadSongEvents
               playHead
                  |
                  v
  loadedSong = [["c'\2", "c'\2"], "c'\2", "g'\1", "g'\1"]
     // två noter i samma event, eller sätt som subarray
     // +Ska man redan här lägga över i en Javascript-array
  playHead/songPosition
     // kolla att inte går utanför arrayen
- stepForward
- stepBackward
- toStart
// getRating   ??
// setRating
//   timesRated
- addToTimesPlayed / Tally
// setLoopStart
// setLoopEnd
--
(SEARCHLIBRARY)

# Model ----
LibraryDAO / SongDAO ??
(UserDAO)


