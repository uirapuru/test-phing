Feature: Adding new task to todo list
  In order to have tasks in todo list
  I need to be able to create a new task
  And save it to the list

  Scenario: Put one task into list
    Given: I have a list named "Grzegorz" created
    When I push a new tasks to list "Grzegorz"
    | title      | content                               | finished |
    | Buy a milk | Mom asked me to buy a bottle of milk  |          |
    Then list "Grzegorz" counts "1" tasks
    And there are "1" tasks in database

  Scenario: Put already done task into list
    Given: I have a list named "Grzegorz" created
    When I push a new tasks to list "Grzegorz"
      | title      | content                               | finished |
      | Buy a milk | Mom asked me to buy a bottle of milk  |        x |
    Then list "Grzegorz" counts "1" tasks
    And there are "1" tasks in database
