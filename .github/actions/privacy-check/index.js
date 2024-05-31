const core = require('@actions/core');

try {
  const repository = core.getInput('repository');
  core.info(`Checking privacy for repository: ${repository}`);
  // Add your privacy check logic here
} catch (error) {
  core.setFailed(error.message);
}
