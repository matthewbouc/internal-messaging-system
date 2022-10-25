import {createSlice, PayloadAction} from "@reduxjs/toolkit";

export interface MessageState {
    groupId?: number,
    message?: string,
    createdAt?: string,
    status?: string,
    messageId?: number,
    authorId?: number,
    authorFirstName?: string,
    authorLastName?: string,
}

export interface MessageObjectState {
    messages: MessageState[],
}

const initialState: MessageObjectState = {
    messages: []
}

const messageSlice = createSlice({
    name: "message",
    initialState,
    reducers: {
        updateMessages(state, action: PayloadAction<MessageObjectState>) {
            state.messages = action.payload.messages;
        }
    }
});

export const {updateMessages} = messageSlice.actions;
export default messageSlice.reducer;