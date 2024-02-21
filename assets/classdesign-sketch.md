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

View ----
LIBRARY ??

Controller ----
getSong
Song
PLAYER
- stepForward
- stepBackward
// getRating
- setRating
- addToTimesPlayed / Tally
--
(SEARCHLIBRARY)

Model ----
LibraryDAO / SongDAO ??
(UserDAO)


