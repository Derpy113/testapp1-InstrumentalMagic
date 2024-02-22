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
Song
Library.getSong
//// most popular = most played
//   highest rated songs
////   least popular
//// latest played
////   oldest played
  Library.searchSong
PLAYER
  loadedSong = ["c'\2", "c'\2", "g'\1", "g'\1"]
  playHead/songPosition
- stepForward
- stepBackward
- toStart
// getRating
// setRating
- addToTimesPlayed / Tally
// setLoopStart
// setLoopEnd
--
(SEARCHLIBRARY)

# Model ----
LibraryDAO / SongDAO ??
(UserDAO)


