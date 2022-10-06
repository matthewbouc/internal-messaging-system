INSERT INTO company (id, name) VALUES (1, 'Company1'),
                                      (2, 'Company2'),
                                      (3, 'Company3');

INSERT INTO "user" (id, role) VALUES (1,2),
                                     (2,3),
                                     (3,4),
                                     (4,2),
                                     (5,2);

INSERT INTO "meta" (id, user_id, company_id, first_name, last_name) VALUES (1,1,1,'Test', 'User1'),
                                                                           (2,2,1,'Test', 'User2'),
                                                                           (3,3,1,'Test', 'User3'),
                                                                           (4,4,2,'Test', 'User4'),
                                                                           (5,5,3,'Test', 'User5');

INSERT INTO "group" (id, company_id, updated_by_id, group_name, group_status, updated_at) VALUES (1,1,1,'TestGroup1', 'active',now()),
                                                                                                 (2,2,4,'TestGroup2', 'inactive',now()),
                                                                                                 (3,3,5,'TestGroup3', 'active',now()),
                                                                                                 (4,1,1,'TestGroup1-1', 'active',now());

INSERT INTO "user_group" (id, user_id, group_id, notifications) VALUES (1,1,1,0),
                                                                       (2,1,4,1),
                                                                       (3,2,1,0),
                                                                       (4,3,1,2),
                                                                       (5,2,4,0),
                                                                       (6,4,2,0),
                                                                       (7,5,3,4);

INSERT INTO message (id, group_id, user_id, updated_by_id, message_status, message, created_at, updated_at) VALUES (1,1,1,1,'active','First test message', now(), now()),
                                                                                                                   (2,1,2,2,'active','Second Test Message',now(),now()),
                                                                                                                   (3,1,1,1, 'inactive','This should be invisible',now(),now()),
                                                                                                                   (4,4,1,1, 'active', 'Group1-1 Test', now(), now());


INSERT INTO user_setting (id, user_id, theme_primary_color, theme_secondary_color) VALUES (1, 1, '#FFC0CB', '#FFA500');