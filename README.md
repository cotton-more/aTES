# Awesome Task Exchange System (aTES) для UberPopug Inc

![Event storming](/event-storming.jpg)
![Доменая модель](/UberPopug_model.jpg)

## Бизнес-события

 - UserLoggedIn
 - TaskWasCreated
 - MoneyWereCharged
 - AccountWasCleanedUp

##  CUD-события

 - TaskWasCompleted
  - task GUID
 - TaskWasAssigned
  - task GUID


## Список сервисов

### AuthService

Сервис авторизации и аутентификации Фепользователей
Проверяет что пользователь может войти в систему (управления задачами и аккаунтинга)

Produces:

 - UserLoggedIn

### TaskService

Produces:

 - TaskWasCompleted
 - TaskWasAssigned
 - TaskWasCreated

### AccountService

Concumes:

 - TaskWasCompleted
 - TaskWasAssigned

 Produces:

  - MoneyWereCharged
  - TaskWasPaid
  - AccountWasCleanedUp