import GettersLogin from "./getters/GettersLogin";
import GettersListar from "./getters/GettersListar";

const getters = {
    ...GettersLogin,
    ...GettersListar,
}
export default getters;
