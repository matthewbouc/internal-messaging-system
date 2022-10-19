import {createSlice, PayloadAction} from "@reduxjs/toolkit";

export interface GroupState {
    groupId: number,
    groupName: string | null,
    notifications: number | null,
    userGroupId: number | null,
}

export interface GroupObjectState {
    groups: GroupState[],
}

const initialState: GroupObjectState = {
    groups: [{
        'groupId': 0,
        'groupName': null,
        'notifications': null,
        'userGroupId': null,
    }]
}

const groupSlice = createSlice({
    name: "group",
    initialState,
    reducers: {
        updateGroups(state, action: PayloadAction<GroupObjectState>) {
            state.groups = action.payload.groups;
        }
    }
});

export const {updateGroups} = groupSlice.actions;
export default groupSlice.reducer;