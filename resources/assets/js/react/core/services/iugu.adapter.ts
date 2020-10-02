const iugu = window['Laravel'].iugu;

console.log('env', process.env.MIX_IUGU_TOKEN, 'debug', process.env.MIX_IUGU_DEBUG);

iugu.setAccountID(process.env.MIX_IUGU_TOKEN);
iugu.setTestMode(process.env.MIX_IUGU_DEBUG);

export default iugu;