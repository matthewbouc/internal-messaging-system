import {configureStore} from "@reduxjs/toolkit";
import userSettingsReducer from "./reducers/userSettingsSlice";
import messagesReducer from "./reducers/messageSlice";
import groupsReducer from "./reducers/groupSlice";

import { groupApi } from './services/teamChat';
import { messageApi } from "./services/groupMessages";

export const store = configureStore({
    reducer: {
        [groupApi.reducerPath]: groupApi.reducer,
        [messageApi.reducerPath]: messageApi.reducer,
        userSettings: userSettingsReducer,
        messages: messagesReducer,
        groups: groupsReducer,
    },
    middleware: getDefaultMiddleware => getDefaultMiddleware().concat(groupApi.middleware, messageApi.middleware)
});


export type RootState = ReturnType<typeof store.getState>;
export type AppDispatch = typeof store.dispatch;