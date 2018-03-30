drop database robotics;
create database robotics;
use robotics;
create table Members (MemberID int auto_increment, FirstName tinytext, LastName tinytext, Grade tinyint, Year tinyint, Permission tinyint, Username tinytext, Pass tinytext, Email tinytext, Picture BLOB, Description text, Phone varchar(10), Roles text, PRIMARY KEY (MemberID));
create table Events (EventID int auto_increment, Name text, City tinytext, Location text, Parent int, StartDate date, EndDate date, Game int, PRIMARY KEY (EventID));
create table FRCGames (GameID int auto_increment, Name text, Description text, Year smallint, Links text, PRIMARY KEY (GameID));
create table Scouting2018 (ID int auto_increment, ScoutingReport int, Switch tinyint, Scale tinyint, Vault tinyint, EndPos tinyint, ClimbAssts tinyint, PRIMARY KEY (ID));
create table Scouting (ScoutingID int auto_increment, Team int, Author int, Timestamp datetime, Competition text, MatchNumber smallint, StartPos tinyint, AutoAbilities text, Abilities tinyint, Playstyle tinyint, Penalties text, Notes text,Year year, primary key(ScoutingID));