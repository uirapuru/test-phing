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
    And list "Grzegorz" has "1" tasks not done

  Scenario: Put three tasks into list
    Given: I have a list named "Grzegorz" created
    When I push a new tasks to list "Grzegorz"
      | title       | content                               |            finished |
      | Buy a milk1 | Mom asked me to buy a bottle of milk  |                     |
      | Buy a milk2 | Mom asked me to buy a bottle of milk  | 2015-10-10 12:00:00 |
      | Buy a milk3 | Mom asked me to buy a bottle of milk  |                     |
    Then list "Grzegorz" counts "3" tasks
    And there are "3" tasks in database
    And list "Grzegorz" has "2" tasks not done

  Scenario: Put already done task into list
    Given: I have a list named "Grzegorz" created
    When I push a new tasks to list "Grzegorz"
      | title      | content                               |            finished |
      | Buy a milk | Mom asked me to buy a bottle of milk  | 2015-10-10 12:00:00 |
    Then list "Grzegorz" counts "1" tasks
    And list "Grzegorz" has "0" tasks not done
    And there are "1" tasks in database
