Feature: Editing tasks in todo list
  In order to manage tasks in todo list
  I need to be able to edit content and status of task
  And persist these changes

  Scenario: Edit task on the list
    Given: I have a list named "Grzegorz" created
    And there are already tasks with data on "Grzegorz" list:
      | title       | content                               |            finished |             deleted |
      | Buy a milk1 | Mom asked me to buy a bottle of milk  |                     |                     |
      | Buy a milk2 | Mom asked me to buy a bottle of milk  | 2015-10-10 12:00:00 |                     |
      | Buy a milk3 | Mom asked me to buy a bottle of milk  |                     |                     |
    When I save task titled "Buy a milk3" with new data
      | title              | content                               | finished | deleted |
      | Buy a milk3-edited | Mom asked me to buy a bottle of milk  |          |         |
    Then list "Grzegorz" counts "3" tasks
    And there are "3" tasks in database
    And list "Grzegorz" has "2" tasks not done

  Scenario: Set task finished
    Given: I have a list named "Grzegorz" created
    And there are already tasks with data on "Grzegorz" list:
      | title       | content                               |            finished |             deleted |
      | Buy a milk1 | Mom asked me to buy a bottle of milk  |                     |                     |
    When I save task titled "Buy a milk1" with new data
      | title                | content                               | finished            | deleted |
      | Buy a milk1-finished | Mom asked me to buy a bottle of milk  | 2015-10-10 12:00:00 |         |
    Then list "Grzegorz" counts "1" tasks
    And there are "1" tasks in database
    And list "Grzegorz" has "0" tasks not done


  Scenario: Set task deleted
    Given: I have a list named "Grzegorz" created
    And there are already tasks with data on "Grzegorz" list:
      | title       | content                               |            finished |             deleted |
      | Buy a milk1 | Mom asked me to buy a bottle of milk  |                     |                     |
      | Buy a milk2 | Mom asked me to buy a bottle of milk  | 2015-10-10 12:00:00 |                     |
      | Buy a milk3 | Mom asked me to buy a bottle of milk  |                     |                     |
    When I delete task titled "Buy a milk1"
    Then list "Grzegorz" counts "2" tasks
    And there are "2" tasks in database
    And list "Grzegorz" has "1" tasks not done