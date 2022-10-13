import {configureStore} from "@reduxjs/toolkit";
import userSettingsReducer from "./reducers/userSettingsSlice";
import messagesReducer from "./reducers/messageSlice";


export const store = configureStore({
    reducer: {
        userSettings: userSettingsReducer,
        messages: messagesReducer,
    }
});


export type RootState = ReturnType<typeof store.getState>;
export type AppDispatch = typeof store.dispatch;